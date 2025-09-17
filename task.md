# Задание: Обработка данных пользователей на PHP

## 📋 Общее описание
Напишите набор функций для обработки массива пользователей. Каждая функция должна решать конкретную задачу и возвращать ожидаемый результат.

---

## 📝 Требования к решению
- Использование встроенных функций PHP для работы с массивами
- Применение различных конструкций языка (условия, циклы)
- Обработка ошибок и крайних случаев
- Чистый и читаемый код

---

## 🔧 Функции для реализации

### 1. `calculateAverageAge` - Вычисление среднего возраста
```php
function calculateAverageAge(array $users): float
```

**Параметры:**
- `array $users` - массив пользователей, где каждый пользователь имеет поле `age`

**Возвращает:**
- `float` - средний возраст пользователей

**Пример:**
```php
// Входные данные
$users = [
    ['name' => 'John', 'age' => 25],
    ['name' => 'Jane', 'age' => 35],
    ['name' => 'Bob', 'age' => 45]
];

// Результат: 35.0
```

---

### 2. `filterActiveUsers` - Фильтрация активных пользователей
```php
function filterActiveUsers(array $users): array
```

**Параметры:**
- `array $users` - массив пользователей с полем `is_active`

**Возвращает:**
- `array` - массив только активных пользователей

**Пример:**
```php
// Входные данные
$users = [
    ['name' => 'John', 'is_active' => true],
    ['name' => 'Jane', 'is_active' => false],
    ['name' => 'Bob', 'is_active' => true]
];

// Результат
[
    ['name' => 'John', 'is_active' => true],
    ['name' => 'Bob', 'is_active' => true]
]
```

---

### 3. `findUserByEmail` - Поиск пользователя по email
```php
function findUserByEmail(array $users, string $email): ?array
```

**Параметры:**
- `array $users` - массив пользователей
- `string $email` - email для поиска

**Возвращает:**
- `?array` - найденный пользователь или `null`

**Пример:**
```php
// Входные данные
$users = [
    ['name' => 'John', 'email' => 'john@example.com'],
    ['name' => 'Jane', 'email' => 'jane@example.com']
];
$email = 'jane@example.com';

// Результат: ['name' => 'Jane', 'email' => 'jane@example.com']
```

---

### 4. `formatUserData` - Форматирование данных пользователя
```php
function formatUserData(array $user): array
```

**Параметры:**
- `array $user` - данные одного пользователя

**Возвращает:**
- `array` - пользователь с добавленным полем `full_name`

**Пример:**
```php
// Входные данные
$user = [
    'first_name' => 'John',
    'last_name' => 'Doe'
];

// Результат
[
    'first_name' => 'John',
    'last_name' => 'Doe',
    'full_name' => 'John Doe'
]
```

---

### 5. `addAgeGroupField` - Добавление возрастных групп
```php
function addAgeGroupField(array $users): array
```

**Параметры:**
- `array $users` - массив пользователей с полем `age`

**Возвращает:**
- `array` - пользователи с добавленным полем `age_group`

**Возрастные группы:**
- "young" - младше 30 лет
- "adult" - от 30 до 50 лет
- "senior" - старше 50 лет

**Пример:**
```php
// Входные данные
$users = [
    ['name' => 'John', 'age' => 25],
    ['name' => 'Jane', 'age' => 35],
    ['name' => 'Bob', 'age' => 55]
];

// Результат
[
    ['name' => 'John', 'age' => 25, 'age_group' => 'young'],
    ['name' => 'Jane', 'age' => 35, 'age_group' => 'adult'],
    ['name' => 'Bob', 'age' => 55, 'age_group' => 'senior']
]
```

---

### 6. `sortUsersByRegistrationDate` - Сортировка по дате регистрации
```php
function sortUsersByRegistrationDate(array $users): array
```

**Параметры:**
- `array $users` - массив пользователей с полем `registration_date`

**Возвращает:**
- `array` - отсортированный массив пользователей (от новых к старым)

**Пример:**
```php
// Входные данные
$users = [
    ['name' => 'John', 'registration_date' => '2023-01-15'],
    ['name' => 'Jane', 'registration_date' => '2023-03-10'],
    ['name' => 'Bob', 'registration_date' => '2022-11-20']
];

// Результат
[
    ['name' => 'Jane', 'registration_date' => '2023-03-10'],
    ['name' => 'John', 'registration_date' => '2023-01-15'],
    ['name' => 'Bob', 'registration_date' => '2022-11-20']
]
```

---

### 7. `getUserStats` - Статистика пользователей
```php
function getUserStats(array $users): array
```

**Параметры:**
- `array $users` - массив пользователей

**Возвращает:**
- `array` - массив со статистикой

**Статистика включает:**
- `total_users` - общее количество пользователей
- `active_users` - количество активных пользователей
- `average_age` - средний возраст
- `inactive_users` - количество неактивных пользователей

**Пример:**
```php
// Входные данные
$users = [
    ['name' => 'John', 'age' => 25, 'is_active' => true],
    ['name' => 'Jane', 'age' => 35, 'is_active' => false],
    ['name' => 'Bob', 'age' => 45, 'is_active' => true]
];

// Результат
[
    'total_users' => 3,
    'active_users' => 2,
    'average_age' => 35.0,
    'inactive_users' => 1
]
```

---

### 8. `processUsers` - Основная функция обработки
```php
function processUsers(array $users): array
```

**Параметры:**
- `array $users` - массив пользователей

**Возвращает:**
- `array` - полностью обработанный массив пользователей

**Выполняет последовательно:**
1. Добавляет полное имя каждому пользователю
2. Добавляет возрастную группу
3. Сортирует по дате регистрации

**Пример:**
```php
// Входные данные
$users = [
    [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'age' => 25,
        'is_active' => true,
        'registration_date' => '2023-01-15'
    ],
    [
        'first_name' => 'Jane',
        'last_name' => 'Smith',
        'age' => 35,
        'is_active' => false,
        'registration_date' => '2023-03-10'
    ]
];

// Результат
[
    [
        'first_name' => 'Jane',
        'last_name' => 'Smith',
        'age' => 35,
        'is_active' => false,
        'registration_date' => '2023-03-10',
        'full_name' => 'Jane Smith',
        'age_group' => 'adult'
    ],
    [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'age' => 25,
        'is_active' => true,
        'registration_date' => '2023-01-15',
        'full_name' => 'John Doe',
        'age_group' => 'young'
    ]
]
```

---

## 🧪 Тестовые данные

```php
$testUsers = [
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
    ]
];
```

---

## 📁 Структура файлов

```
project/
├── solution.php          # Решение ученика
├── test_system.php       # Тестирующая система
├── correct_solution.php  # Эталонное решение
└── README.md            # Это описание
```

---

## 🚀 Как начать работу

1. Создайте файл `solution.php`
2. Реализуйте все требуемые функции
3. Протестируйте решение с помощью `test_system.php`
4. Убедитесь, что все тесты проходят

---

## ✅ Критерии оценки

- **5/5**: Все тесты пройдены, код чистый и читаемый
- **4/5**: Пройдены основные тесты, есть мелкие недочеты
- **3/5**: Работает частично, пройдено менее 70% тестов
- **2/5**: Код не компилируется или нарушает требования

---

## 💡 Советы

- Используйте встроенные функции PHP (`array_map`, `array_filter`, `usort`)
- Обрабатывайте крайние случаи (пустые массивы, отсутствующие поля)
- Проверяйте типы данных
- Пишите чистый и читаемый код
- Тестируйте каждую функцию отдельно

Удачи в выполнении задания! 🍀