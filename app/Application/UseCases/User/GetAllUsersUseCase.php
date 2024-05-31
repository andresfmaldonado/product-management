<?php

namespace App\Application\UseCases\User;

use App\Core\Repositories\UserRepository;

class GetAllUsersUseCase {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function execute() {
        return $this->userRepository->getAll();
    }
}
