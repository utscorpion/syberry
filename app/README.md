#Syberry

## Installation

```
git clone https://github.com/utscorpion/syberry.git
```

## Setting up Syberry

### For Local environments
Ensure your local `.env` is up to date with example from `.env.local.dist`
Execute the following sequence of commands:
```
cd /Sybbery

composer install

composer update
```

### To Run migration and seeding
To run all of your outstanding migrations and to seed them, execute the `migrate` Artisan command:
```
php artisan migrate
```
