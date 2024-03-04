<?php
$products = array(
  array("name" => "Green Vegetables","price" => 200, "quantity" => 5),
  array("name" => "Haldiram Bhujia","price" => 250, "quantity" => 3),
  array("name" => "Cinthol Soap","price" => 200, "quantity" => 7)
);

$cart = array();

function addToCart($productId, $quantity) {
  global $products, $cart;
  if(isset($products[$productId])) {
      if($products[$productId]['quantity'] >= $quantity) {
          if(isset($cart[$productId])) {
              $cart[$productId]['quantity'] += $quantity;
          } else {
              $cart[$productId] = array(
                  'name' => $products[$productId]['name'],
                  'price' => $products[$productId]['price'],
                  'quantity' => $quantity
              );
          }
          $products[$productId]['quantity'] -= $quantity;
          echo "Product added to card successfully"."<br/>";
          echo "Details are :"."<br/>";
          echo "Product Name : ". $products[$productId]['name']."<br/>";
          echo "Product Price : ". $products[$productId]['price']."<br/>";
          echo "Product Quantity Added: ". $quantity."<br/>";
          echo "<hr/>";
      } else {
          echo "Error: Requested quantity exceeds available stock.";
          echo "<hr/>";
      }
  } else {
      echo "Error: Product not found.";
      echo "<hr/>";
  }
}





function removeFromCart($productId, $quantity) {
    global $products, $cart;
    if(isset($cart[$productId])) {
        if($cart[$productId]['quantity'] >= $quantity) {
            if($cart[$productId]['quantity'] > $quantity) {
                $cart[$productId]['quantity'] -= $quantity;
            } else {
                unset($cart[$productId]);
            }
            $products[$productId]['quantity'] += $quantity;
            echo "Product removed from card successfully"."<br/>";
            echo "Details are :"."<br/>";
            echo "Product Name : ". $products[$productId]['name']."<br/>";
            echo "Product Price : ". $products[$productId]['price']."<br/>";
            echo "Product Quantity Removed: ". $quantity."<br/>";
            echo "<hr/>";
        } else {
            echo "Error: Requested quantity exceeds quantity in cart.";
            echo "<hr/>";
        }
    } else {
        echo "Error: Product not found in cart.";
        echo "<hr/>";
    }
}


addToCart(0,1);
addToCart(1,3);

removeFromCart(0,1);


function calculateTotal()
{
  global $cart;
  $total = 0;
  foreach($cart as $product)
  {
    $total+= $product['price']*$product['quantity'];
  }
  return $total;
}

function displayCart()
{
  global $cart;
  echo "Cart Summary :"."<br/>";
  foreach($cart as $product)
  {
    echo $product['name']. " - Quantity : ".$product['quantity']. " - Price : $ ". $product['price']."<br/>";
  }
  $total = calculateTotal();
  $discount = $total < 1000 ? 0.02 : 0.05;
  $discount_amt = $total * $discount;
  $final_amt  = $total - $discount_amt;
  echo "Total : ". $total. "<br/>";
  echo "Discount : ". $discount. "<br/>";
  echo "Discount Amount: ". $discount_amt. "<br/>";
  echo "Final Total : ". $final_amt. "<br/>";
}

displayCart();
    
?>





