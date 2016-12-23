EAV
===

*entity*
| id | name     |
| 1  | user     |
| 2  | planning |

*attribute*
| id | entity_id | attr_name |
| 1  | 1         | username  |
| 2  | 1         | password  |
| 3  | 1         | email     |
| 4  | 2         | label     |
| 5  | 2         | duedate   |
| 6  | 1         | role      |

```sql
SELECT * FROM attribute as a
LEFT JOIN entity as e ON a.entity_id = e.id
WHERE e.name = 'planning';
```

```php
$planningAttributes = [
    0 => [
        'id' => 4,
        'entity_id' => 2,
        'attr_name' => 'label',
    ],
    1 => [
        'id' => 5,
        'entity_id' => 2,
        'attr_name' => 'duedate',
    ],
];
```

*value*
| object_id | attr_id | value           |
| 1         | 1       | fltou           |
| 1         | 3       | qwerty@smile.fr |
| 1         | 2       | qwerty          |
| 2         | 1       | qwerty          |
| 1         | 4       | coo             |

```sql
SELECT * FROM value as v
LEFT JOIN attribute as a ON v.attribute_id = a.id
WHERE a.attr_name = 'label' OR a.attr_name = 'duedate';
```

```php
$planningAttributes = [
    0 => [
        'object_id' => 2,
        'attr_id' => 4,
        'value' => 'coo',
    ],
];
```

*User*
| id |
| 1  |
| 2  |

*Planning*
| id |
| 1  |
