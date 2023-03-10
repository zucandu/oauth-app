## OAuth 2.0 App for Zucandu Platform

<p>This is a example code to perform OAuth 2.0 authentication and interact with Zucandu's API without a SDK. In this example, we are going to create a very basic app to get an access token using PHP CURL. From this sample code you can use it for your application and programming language.</p>

<p>You'll be able to connect to a Zucandu API and make real API calls - we recommend you create a test app.</p>

## Getting Started
To run locally, you'll need a local web server with PHP support.

## Registering your app

<p>First, you'll need to <a href="https://zucandu.com/developer-account-registration" target="_blank">register your dev account</a> then <a href="https://zucandu.com/account/apps/create" target="_blank">create your app</a>. Every registered OAuth application is assigned a unique Client ID and Client Secret. The Client Secret should not be shared! That includes checking the string into your repository.</p>

<p>You can fill out every piece of information however you like, except the Authorization callback URL. This is easily the most important piece to setting up your application. It's the callback URL that Zucandu returns the user to after successful authentication.</p>