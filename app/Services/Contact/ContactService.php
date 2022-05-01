<?php

namespace App\Services\Contact;

use App\Models\Contact;
use App\Repositories\Contact\Contract\ContactRepositoryContract;
use App\Services\Contact\Contract\ContactServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class ContactService implements ContactServiceContract
{

    /**
     * @var ContactRepositoryContract
     */
    protected ContactRepositoryContract $contactRepository;

    /**
     * @param ContactRepositoryContract $contactRepository
     */
    public function __construct(ContactRepositoryContract $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @param array $columns
     * @return null|Collection
     */
    public function getAll(array $columns = ['*']) : ?Collection
    {
        try {
            return $this->contactRepository->getAll($columns);
        } catch (\Exception $e) {
            Log::error(
                'services.ContactService.getAll',
                [
                    'status_code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            );
            throw $e;
        }
    }

    /**
     * @param int $id
     * @param array $columns
     * @return null|Contact
     */
    public function getById(int $id, array $columns = ['*']): ?Contact
    {
        try {
            $contact = $this->contactRepository->getById($id, $columns);
            if(!$contact) {
                throw new \Exception('Contact not found');
            }
            return $contact;
        } catch (\Exception $e) {
            Log::error(
                'services.ContactService.getById',
                [
                    'status_code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            );
            throw $e;
        }
    }

    /**
     * @param array $data
     * @return Contact
     */
    public function create(array $data): Contact
    {
        try {
            return $this->contactRepository->create($data);
        } catch (\Exception $e) {
            Log::error(
                'services.ContactService.create',
                [
                    'status_code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            );
            throw $e;
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @return Contact
     */
    public function update(int $id, array $data): Contact
    {
        try {
            $contact = $this->getById($id);
            if(!$contact) {
                throw new \Exception('Contact not found');
            }
            return $this->contactRepository->update($id, $data);
        } catch (\Exception $e) {
            Log::error(
                'services.ContactService.update',
                [
                    'status_code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            );
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        try {
            $contact = $this->getById($id);
            if(!$contact) {
                throw new \Exception('Contact not found');
            }
            return $this->contactRepository->delete($id);
        } catch (\Exception $e) {
            Log::error(
                'services.ContactService.delete',
                [
                    'status_code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            );
            throw $e;
        }
    }
}
