<?php

namespace App\Crud;

/**
 * Class Request.
 *
 * @author Evanny Karol Hernandez Garcia <evannykarol1990@gmail.com>
 */
class Respuesta
{
    /**
     * @var array
     */
    public $request;

    /**
     * Set request.
     *
     * @param array $request
     *
     * @return void
     */
    public function setRequest(array $request)
    {
        $this->request = $request;
    }

    /**
     * Get request.
     *
     * @return array $request
     */
    public function getRequest()
    {
        return $this->request;
    }
}
