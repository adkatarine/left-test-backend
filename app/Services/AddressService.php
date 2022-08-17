<?php

namespace App\Services;

use App\Repositories\API\BrasilApi as ZipCodeAPI;
use App\Utils\FormatData;
use App\Repositories\Contracts\AddressRepositoryInterface;
use Exception;

class AddressService {

    private $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository) {
        $this->addressRepository = $addressRepository;
    }

    public function create(array $data) {
        $address = ZipCodeAPI::getAddressByZipCode($data['cep']);
        $address = FormatData::jsonDecodeResponse($address);
        $data['state'] = $address['state'];
        $data['city'] = $address['city'];
        $data['neighborhood'] = $address['neighborhood'];
        $data['street'] = $address['street'];
        return $this->addressRepository->create($data);;
    }

    public function update(int $id, array $data) {
        $address = $this->findById($id);

        if($data['cep'] !== $address->cep) {
            $address = ZipCodeAPI::getAddressByZipCode($data['cep']);
            $address = FormatData::jsonDecodeResponse($address);
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
        return $this->addressRepository->findById($id);
    }

    public function delete(int $id) {
        return $this->addressRepository->delete($id);
    }
}
