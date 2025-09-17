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
    //примает весь массив с USERS
    // нужно посчитать средний возраст людей
    return 0.0;
}

function filterActiveUsers(array $users): array {
    //примает весь массив с USERS
    // нужно вернуть новый массив только с активными статусми is_active
    return [];
}

function sortUsersByRegistrationDate(array $users): array {
    //примает весь массив с USERS
    // нужно отсортировать весь массив по дате регистрации
    // по убыванию даты
    return [];
}

function getUserStats(array $users): array {
    //вернуть полную статистику по данным ввиде асс. массива
    
        // ['total_users' => ?,
        // 'active_users' => ?,
        // 'average_age' => ?,
        // 'inactive_users' => ?]
    
    return [];
}

function findUserByEmail(array $users, string $email): ?array {
    //найти пользователя по конкретному email и вернуть его карточку
    return [];
}

function formatUserData(array $user): array {
    //принимаете асс. массив(словарь) одного пользователя
    //ВВОД ДАННЫХ
    // [
    //     'id' => 1,
    //     'first_name' => 'John',
    //     'last_name' => 'Doe',
    //     'email' => 'john.doe@example.com',
    //     'age' => 28,
    //     'is_active' => true,
    //     'registration_date' => '2023-01-15'
    // ]

    // создать у USER новое поле full_name где будет находиться значение: 'first_name last_name'
    // 'first_name' => 'John',
    // 'last_name' => 'Doe',
    // 'full_name' => 'John Doe'  <--- должно получиться это

      

    return [];
}

function addAgeGroupField(array $users): array {
    //добавить у каждого пользователя поле age_group
    // указать его возрастную группу
    // 0-30(<30) - young
    // 30 - 50(<=50) - adult
    // 51 - 99 (<= 99) - senior
    return [];
}

// Пример данных
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


//ВЫВОД ДАННЫХ
// $processed = processUsers($users);
// print_r($processed);