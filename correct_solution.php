<?php

function processUsers(array $users): array {
    if (empty($users)) {
        return [];
    }
    
    $users = array_map('formatUserData', $users);
    $users = addAgeGroupField($users);
    $users = sortUsersByRegistrationDate($users);
    
    return $users;
}

function calculateAverageAge(array $users): float {
    if (empty($users)) {
        return 0;
    }
    
    $totalAge = 0;
    $count = 0;
    
    foreach ($users as $user) {
        if (isset($user['age'])) {
            $totalAge += $user['age'];
            $count++;
        }
    }
    
    return $count > 0 ? round($totalAge / $count, 2) : 0;
}

function filterActiveUsers(array $users): array {
    return array_filter($users, function($user) {
        return isset($user['is_active']) && $user['is_active'] === true;
    });
}

function sortUsersByRegistrationDate(array $users): array {
    if (empty($users)) {
        return [];
    }
    
    usort($users, function($a, $b) {
        $dateA = strtotime($a['registration_date'] ?? '1970-01-01');
        $dateB = strtotime($b['registration_date'] ?? '1970-01-01');
        
        return $dateB <=> $dateA; // Новые first
    });
    
    return $users;
}

function getUserStats(array $users): array {
    $activeUsers = filterActiveUsers($users);
    
    return [
        'total_users' => count($users),
        'active_users' => count($activeUsers),
        'average_age' => calculateAverageAge($users),
        'inactive_users' => count($users) - count($activeUsers)
    ];
}

function findUserByEmail(array $users, string $email): ?array {
    foreach ($users as $user) {
        if (isset($user['email']) && $user['email'] === $email) {
            return $user;
        }
    }
    
    return null;
}

function formatUserData(array $user): array {
    $user['full_name'] = trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''));
    return $user;
}

function addAgeGroupField(array $users): array {
    return array_map(function($user) {
        if (!isset($user['age'])) {
            $user['age_group'] = 'unknown';
            return $user;
        }
        
        $age = $user['age'];
        if ($age < 30) {
            $user['age_group'] = 'young';
        } elseif ($age <= 50) {
            $user['age_group'] = 'adult';
        } else {
            $user['age_group'] = 'senior';
        }
        
        return $user;
    }, $users);
}

// Пример использования
$users = [
    [
        'id' => 1,
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'age' => 28,
        'is_active' => true,
        'registration_date' => '2023-01-15'
    ],
    [
        'id' => 2,
        'first_name' => 'Jane',
        'last_name' => 'Smith',
        'email' => 'jane.smith@example.com',
        'age' => 35,
        'is_active' => false,
        'registration_date' => '2022-11-20'
    ]
];

// $processed = processUsers($users);
// print_r($processed);