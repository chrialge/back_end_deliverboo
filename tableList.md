# table: users

-   id | BIGINT | UNIQUE | AI | PK | NOTNULL | INDEX
-   name | VARCHAR(50) | NOTNULL
-   last_name | VARCHAR(50) | NOTNULL
-   email | VARCHAR | NOT NULL | UNIQUE
-   password | VARCHAR(50) | NOTNULL | MIN:3 | MAX:50

# table: restaurants

-   id | BIGINT | UNIQUE | AI | PK | NOTNULL | INDEX
-   user_id | BIGINT | NOTNULL | FK
-   name | VARCHAR(100) | NOTNULL
-   slug | VARCHAR(150)| NOTNULL
-   phone_number | TINYINT | NULLABLE
-   image | VARCHAR(255) | NULLABLE
-   address | VARCHAR(100) | NOTNULL
-   vat_number | CHAR(11) | NOTNULL

# table: restaurant_type

-   type_id | BIGINT| NOTNULL | FK
-   restaurant_id | BIGINT | NOTNULL | FK

# table: type

-   id | BIGINT | UNIQUE | AI | PK | NOTNULL | INDEX
-   name | VARCHAR(50) | NOTNULL
-   slug | VARCHAR(150)| NOTNULL
-   icon | VARCHAR(255) | NULL

# table: dishes

-   id | BIGINT | UNIQUE | AI | PK | NOTNULL | INDEX
-   restaurant_id | BIGINT | NOTNULL | FK
-   name | VARCHAR(50) | NOTNULL
-   slug | VARCHAR(150)| NOTNULL
-   image | VARCHAR(255) | NOTNULL
-   ingredients | TEXT | NOTNULL
-   price | DECIMAL(5,2) | NOTNULL
-   visibility | TINYINT | DEFAULT(0)

# table: dish_order

-   dish_id | BIGINT| NOTNULL | FK
-   order_id | BIGINT | NOTNULL | FK
-   quantity | TINYINT | NOTNULL
-   price_per_unit | DECIMAL(5,2) | NOTNULL

# table: orders

-   id | BIGINT | UNIQUE | AI | PK | NOTNULL | INDEX
-   restaurant_id | BIGINT | NOTNULL | FK
-   customer_name | VARCHAR(50) | NOTNULL
-   customer_lastname | VARCHAR(50) | NOTNULL
-   customer_address | VARCHAR(50) | NOTNULL
-   customer_phone_number| VARCHAR(50) | NOTNULL
-   customer_email | VARCHAR(50) | NOTNULL
-   customer_note | TEXT | NULL
-   total_price | DECIMAL(6,2) | NOTNULL
-   status | VARCHAR(50) | NOTNULL

// Eventualmente in futuro

# table: allergen_dish

-   allergens_id | TINYINT | NOTNULL | FK
-   dish_id | INT | NOTNULL | FK

# table: allergens

-   id | BIGINT | UNIQUE | AI | PK | NOTNULL | INDEX
-   allergen | VARCHAR(50) | NOTNULL
