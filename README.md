# Square Peg
> "A square is exactly equal to the sum of its parts" - Albert Einstein (Allegedly)

## Getting Started

### Requirements

1. Functioning computer
2. PHP 8.1
3. [Paw](https://paw.cloud) (or other API testing tool, ie, [Postman](https://www.postman.com/product/api-client))

### Configuration

No configuration should be needed of the application itself. At most, you might wish to swap `https://` for `http://` in `APP_URL`

### Database

Once you have the application running in your development environment, execute the following command from the project folder:

* `php artisan db:seed`
* `php artisan migrate`

(Note: The application is configured to use SQLite. The `seed` action doesn't actually seed the database but creates the file for SQLite if it does not yet exist.)

## Usage

This application was developed while using Paw for interacting with the API endpoints. Paw is not required, but a project file for Paw has been included under `_dev/Squarepeg.paw`.

If you do use the included Paw file, you might need to adjust the Environment Variables configured in paw, setting `local/SERVER` to your local development url. It is currently set to `https://squarepeg.test`

## Endpoints

Examples:
* `https://squarepeg.test/sum_squares?limit=25`
* `https://squarepeg.test/sum_people_squares?people=John,Jill,Jane`

| Endpoint           | Params                       | Description                                                                                           |
|--------------------|------------------------------|-------------------------------------------------------------------------------------------------------|
| sum_squares        | limit = {int min:1}          | Iterates from 1 to {limit}, squaring each value and returns the sum of all the squares                |
| square_sums        | limit = {int min:1, max:100} | Sums all numbers from 1 to {limit} and returns the square of the result                               |
| diff_squares       | limit = {int min:1, max:100} | Squares all sums and sums all squares from 1 to {limit} and returns the difference of the two results |
| sum_people_squares | people = {csv string min:1, max:15} | Squares each individual in a list then returns the summed up squares.                                 |
| square_people_sums | people = {csv string min:1, max:15} | Sums each individual in a list then returns the square of the sums.                        |
