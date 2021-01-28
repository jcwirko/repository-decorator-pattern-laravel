<?php

namespace App\Cache;

use App\Contracts\BaseRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Cache;

abstract class BaseCache implements BaseRepositoryInterface
{
    const TTL = 86400000;
    protected $cache;
    protected $repository;
    protected $key;

    public function __construct(BaseRepository $repository, string $key)
    {
        $this->cache = new Cache();
        $this->repository = $repository;
        $this->key = $key;
    }
}
