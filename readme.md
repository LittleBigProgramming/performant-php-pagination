## Added pagination of Articles associated to Users data created by Faker. Using Fractal as a transformation layer for data output.

```
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

In order to add X amount of users using tinker use the user factory which has been added via make:auth and use `factory(App\User::class, X)` and the inbuilt create method.

To create articles that are associated with a user run the following `factory(App\Article::class, X)->create(['user_id' => X])`

The url format for pagination is `http://laravel-pagination.test//articles?page=X` this is the same for the the users endpoint with the keyword articles replaced with users. 

The pagination data carries to amount that is set in the paginate method called in the relevant controller along with the fractal meta data which contains the essential information for the pagination component. 

For reusability the `pagination` component has been set up in a such a way that it can be used with a `for="keyword` or fallback to default to work seperate of each other within the same page. 
