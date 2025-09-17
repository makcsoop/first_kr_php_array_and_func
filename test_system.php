<?php
// test_system.php

// Подключаем решение
//require_once 'solution.php';
require_once 'correct_solution.php';

class UserTestSystem {
    
    private $testData = [
        [
            'id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'age' => 25,
            'is_active' => true,
            'registration_date' => '2023-01-15'
        ],
        [
            'id' => 2,
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane@example.com',
            'age' => 35,
            'is_active' => false,
            'registration_date' => '2022-11-20'
        ],
        [
            'id' => 3,
            'first_name' => 'Bob',
            'last_name' => 'Johnson',
            'email' => 'bob@example.com',
            'age' => 45,
            'is_active' => true,
            'registration_date' => '2023-03-10'
        ],
        [
            'id' => 3,
            'first_name' => 'Max',
            'email' => 'max.roslov@gmail.com',
            'age' => 18,
            'is_active' => false,
            'registration_date' => '2000-03-10'
        ]
    ];

    public function runAllTests() {
        $results = [];
        
        $results['calculateAverageAge'] = $this->testCalculateAverageAge();
        $results['filterActiveUsers'] = $this->testFilterActiveUsers();
        $results['findUserByEmail'] = $this->testFindUserByEmail();
        $results['formatUserData'] = $this->testFormatUserData();
        $results['addAgeGroupField'] = $this->testAddAgeGroupField();
        $results['sortUsersByRegistrationDate'] = $this->testSortUsersByRegistrationDate();
        $results['getUserStats'] = $this->testGetUserStats();
        $results['processUsers'] = $this->testProcessUsers();

        return $results;
    }

    private function testCalculateAverageAge() {
        $result = calculateAverageAge($this->testData);
        $expected = (25 + 35 + 45 + 18) / 4;
        return abs($result - $expected) < 0.01;
    }

    private function testFilterActiveUsers() {
        $result = filterActiveUsers($this->testData);
        return count($result) === 2; // Должно быть 2 активных пользователя
    }

    private function testFindUserByEmail() {
        $result = findUserByEmail($this->testData, 'jane@example.com');
        return $result && $result['id'] === 2;
    }

    private function testFormatUserData() {
        $testUser1 = $this->testData[0];
        $testUser2 = $this->testData[1];
        $result1 = formatUserData($testUser1);
        $result2 = formatUserData($testUser2);
        return isset($result1['full_name']) && $result1['full_name'] === 'John Doe' &&
                isset($result2['full_name']) && $result2['full_name'] === 'Jane Smith';
    }

    private function testAddAgeGroupField() {
        $result = addAgeGroupField($this->testData);
        $ageGroups = array_column($result, 'age_group');
        return in_array('young', $ageGroups) && 
               in_array('adult', $ageGroups) && 
               in_array('adult', $ageGroups);
    }

    private function testSortUsersByRegistrationDate() {
        $result = sortUsersByRegistrationDate($this->testData);
        $dates = array_column($result, 'registration_date');
        return $dates[0] === '2023-03-10' && 
               $dates[1] === '2023-01-15' && 
               $dates[2] === '2022-11-20' && 
               $dates[3] === '2000-03-10';;
    }

    private function testGetUserStats() {
        $result = getUserStats($this->testData);
        return $result['total_users'] === 4 &&
               $result['active_users'] === 2 &&
               $result['average_age'] === 30.75 &&
               $result['inactive_users'] === 2;
    }

    private function testProcessUsers() {
        $result = processUsers($this->testData);
        return count($result) === 4 &&
               isset($result[0]['full_name']) &&
               isset($result[0]['age_group']);
    }

    public function printResults($results) {
        echo "=== РЕЗУЛЬТАТЫ ТЕСТИРОВАНИЯ ===\n\n";
        
        $passed = 0;
        $total = count($results);
        
        foreach ($results as $testName => $passedTest) {
            $status = $passedTest ? '✅ ПРОЙДЕН' : '❌ НЕ ПРОЙДЕН';
            echo str_pad($testName, 35) . ": $status\n";
            if ($passedTest) $passed++;
        }
        
        echo "\n=== ИТОГ ===\n";
        echo "Пройдено тестов: $passed/$total\n";
        echo "Процент успеха: " . round(($passed/$total)*100, 2) . "%\n";
        
        if ($passed === $total) {
            echo "\n🎉 ВСЕ ТЕСТЫ ПРОЙДЕНЫ УСПЕШНО!\n";
        } else {
            echo "\n⚠️  Есть ошибки в решении\n";
        }
    }

    public function printProcessedData() {
        echo "=== ИСХОДНЫЕ ДАННЫЕ ===\n";
        print_r($this->testData);
        
        echo "\n=== ОБРАБОТАННЫЕ ДАННЫЕ ===\n";
        $processed = processUsers($this->testData);
        print_r($processed);
        
        echo "\n=== СТАТИСТИКА ===\n";
        $stats = getUserStats($this->testData);
        print_r($stats);
        
        echo "\n=== АКТИВНЫЕ ПОЛЬЗОВАТЕЛИ ===\n";
        $active = filterActiveUsers($this->testData);
        print_r($active);
    }
}

// Запуск тестов
$testSystem = new UserTestSystem();
$results = $testSystem->runAllTests();
$testSystem->printResults($results);

echo "\n";
$testSystem->printProcessedData();