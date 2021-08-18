## EStore Feature - Eric Wickham

The estore feature is the one I am most proud of, for the relative difficulty in putting it together as well as the total functionality I achieved. 
The PDO / Models / Classes all work perfectly with this feature, and the forms are pulling and pushing into the DB very smoothly. 

## Logic

Here's the logic for this feature

1. Pull the product data from the database to get product ID, name, price and image url
2. List each individual item in a separate container that you can add to a cart
3. On selecting any of these items, it is appended to a shopping cart array and displayed in a table below the item carousel
4. When you're ready, hit checkout, which takes you to the checkout php page
5. on Checkout.php the user can review the items in their shopping cart and either purchase the items, or empty the cart, destroying the session
6. if user hits send, the purchase data is sent into a new table inside our database, the item names and quantities are sent as text values and the total cost is sent as an integer. 
7. This inserted data will be used as a record of purchase that will permanently be related to the user that purchased the item. 

 scaling up this purchase action will implement a paypal api call to verify payment information


## Challenges

Many. I found nesting an array inside another array to be a bit jarring in PHP, but I eventually sorted that out. I wanted to build individual pages for each product, but the session variables/shopping cart did not play well with that at all. 
This final version of the cart was my fourth or fifth iteration of the original project. I am happy it functions this well. 
