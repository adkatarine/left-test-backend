<?php

namespace App\Services;

use App\Repositories\API\BrasilApi as ZipCodeAPI;
use App\Utils\FormatData;
use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Exceptions\NotFoundException;
use App\Exceptions\InvalidZipCodeException;

class AddressService {

    private $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository, ClientRepositoryInterface $clientRepository) {
        $this->addressRepository = $addressRepository;
        $this->clientRepository = $clientRepository;
    }

    public function create(array $data) {
        $client = $this->clientRepository->findById($data['client_id']);

        if(!$client) {
            throw new NotFoundException('Cliente');
        }

        $address = ZipCodeAPI::getAddressByZipCode($data['cep']);
        $address = FormatData::jsonDecodeResponse($address);

        if(array_key_exists('errors', $address)) {
            throw new InvalidZipCodeException();
        }

        // atualiza as informações do endereço consultadas através do cep
        $data['state'] = $address['state'];
        $data['city'] = $address['city'];
        $data['neighborhood'] = $address['neighborhood'];
        $data['street'] = $address['street'];

        return $this->addressRepository->create($data);;
    }

    public function update(int $id, array $data) {
        $client = $this->clientRepository->findById($data['client_id']);
        $address = $this->findById($id);

        if(!$address || !$client) {
            throw new NotFoundException('Endereço e|ou Cliente');
        }

        if($data['cep'] !== $address->cep) {
            $address = ZipCodeAPI::getAddressByZipCode($data['cep']);
            $address = FormatData::jsonDecodeResponse($address);

            if(array_key_exists('errors', $address)) {
                throw new InvalidZipCodeException();
            }

            // atualiza as informações do endereço consultadas através do cep
            $data['state'] = $address['state'];
            $data['city'] = $address['city'];
            $data['neighborhood'] = $address['neighborhood'];
            $data['street'] = $address['street'];
        }
        return $this->addressRepository->update($id, $data);
    }

    public function findAll() {
        return $this->addressRepository->findAll();
    }

    public function findById(int $id) {
        $address = $this->addressRepository->findById($id);

        if(!$address) {
            throw new NotFoundException('Endereço');
        }

        return $address;
    }

    public function delete(int $id) {
        $address = $this->findById($id);

        if(!$address) {
            throw new NotFoundException('Endereço');
        }

        return $this->addressRepository->delete($id);
    }
}
