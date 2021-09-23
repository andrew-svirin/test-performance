<?php
/**
 * @var \Faker\Generator $faker
 * @var int $index
 */
return [
    'id' => $index + 1,
    'author_id' => $index + 1,
    'title' => $faker->sentence,
    'created' => $faker->dateTime->format('Y-m-d H:i:s'),
    'updated' => $faker->dateTime->format('Y-m-d H:i:s'),
];
