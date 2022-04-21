<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use App\Repositories\Contact\Contract\ContactRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class ContactRepository implements ContactRepositoryContract {

    /**
     * @param array $columns
     * @return null|Collection
     */
    public function getAll( array $columns = ['*']) : ?Collection{
        return Contact::all($columns);
    }

    /**
     * @param int $id
     * @param array $columns
     * @return null|Contact
     */
    public function getById(int $id, array $columns = ['*']): ?Contact {
        return Contact::find($id, $columns);
    }

    /**
     * @param array $data
     * @return Contact
     */
    public function create(array $data) : Contact {
        return Contact::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Contact
     */
    public function update(int $id, array $data) : Contact {
        $contact = Contact::findOrFail($id);
        $contact->update($data);
        return $contact;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool {
        $contact = Contact::findOrFail($id);
        return $contact->delete();
    }
}