<?php

namespace App\Application\UseCases\User;

use App\Core\Repositories\UserRepository;

class GetUserByIdUseCase {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function execute($id) {
        return $this->userRepository->getById($id);
    }
}
