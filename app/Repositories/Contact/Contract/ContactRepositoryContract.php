<?php

namespace App\Repositories\Contact\Contract;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Expr\AssignOp\Concat;

interface ContactRepositoryContract {

    /**
     * @param array $columns
     * @return null|Collection
     */
    public function getAll(array $columns = ['*']) : ?Collection;

    /**
     * @param int $id
     * @param array $columns
     * @return null|Contact
     */
    public function getById(int $id, array $columns = ['*']): ?Contact;

    /**
     * @param array $data
     * @return Contact
     */
    public function create(array $data) : Contact;

    /**
     * @param int $id
     * @param array $data
     * @return Contact
     */
    public function update(int $id, array $data) : Contact;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool; 
}