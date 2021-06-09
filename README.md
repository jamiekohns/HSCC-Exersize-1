# HSCC-Exersize-1
Exercise One for 2021 HSCC team

## Assignment: Weather Tracking

Build an app to track weather in selected locations.

## API
https://www.metaweather.com/api/

## What to track

Your app must be able to track weather for multiple locations, storing key weather metrics in your local database for recall.

Required metrics:
- Temperature
- Weather state
- Air pressure
- Humidity

Other metrics provided by the API may be useful.

## Presentation

- Your app should display the current weather and 3-day forecast for a location on the main page.
- There should be a search bar to search for locations, which will display the current weather and 3-day forecast for that location (if found).
- A visitor should be able to create an account with their email address as their username.
- After creating an account, a user can search for and SAVE locations to their account.
- A user should be able to view the list of locations they've saved.
- A user should be able to view a single location, with the current weather and 3-day forecast (same as an unregistered visitor).

## Notes

This API is read-only (there are no endpoints for saving data, only fetching data). The author requests that you do not hit the API in rapid succession - don't try to download a dozen locations all at once. You might built in some kind of rate-limiting for this.

Composer has been initialized with the dot-env library. You'll need to run `composer install` in your terminal after cloning the repository in order to get everything installed.

Composer also initializes the `/src` directory as the `\App` namespace, so you can namespace everything in directories under `/src`. For example: in the `/src/Database` directory, the namespace for classes will be `\App\Database`, and in the `/src/RestRequest` directory, the namespace is `\App\RestRequest`. New directories should be camel-cased, starting with an upper-case letter.

## Base Classes

The `Database` and `RestRequest` classes have been included already. You should __extend__ these in your app. For example: every database table should have it's own __child class__ of `Database` that handles SELECT, INSERT, UPDATE, etc. for that table. There should only be one __child__ of `RestRequest`- that should fetch all weather data from the API.

For examples of how these work, please refer to last year's application: https://github.com/jamiekohns/BDPA-HSCC-Practice/tree/main/app