<?php

namespace App\Application\UseCases\User;

use App\Core\Repositories\UserRepository;

class CreateUserUseCase {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function execute($user) {
        return $this->userRepository->create($user);
    }
}
