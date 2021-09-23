<?php
/**
 * @var \Faker\Generator $faker
 * @var int $index
 */
return [
    'id' => $index + 1,
    'name' => $faker->firstName . ' ' . $faker->lastName,
    'created' => $faker->dateTime->format('Y-m-d H:i:s'),
    'updated' => $faker->dateTime->format('Y-m-d H:i:s'),
];
