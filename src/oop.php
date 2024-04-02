<?php

echo ('you are on the page');
echo ('</br>');

class Product
{
    public string $productName;
    public float $productPrice;

    public function __construct($productName, $productPrice)
    {
        $this->productName = $productName;
        $this->productPrice = $productPrice;
    }

}

class Order
{
    public array $products = [];

    public string $orderNumber;

    public function __construct()
    {
        $this->orderNumber = uniqid();
    }

    public function addProduct(Product $product, int $quantity) {
        if(isset($this->products[$product->productName])) {
            // Якщо товар вже є у замовленні, збільшуємо кількість
            $this->products[$product->productName]['quantity'] += $quantity;
        } else {
            // Якщо товару немає у замовленні, додаємо його
            $this->products[$product->productName] = [
                'product' => $product,
                'quantity' => $quantity
            ];
        }
    }

    public function removeProduct(Product $product, int $quantitytoRemove)
    {
        if(isset($this->products[$product->productName]))
        {
            $currentQuantity = $this->products[$product->productName]['quantity'];
            if($currentQuantity<$quantitytoRemove)
            {
                unset($this->products[$product->productName]);
            } else
            {
                $this->products[$product->productName]['quantity'] -= $quantitytoRemove;
            }
        }
    }

    public function calculateTotal(){
        $total = 0;
        foreach($this->products as $key=>$item)
        {
            $total += $item['product']->productPrice * $item['quantity'];
        }
        return $total;
    }



}
$product1 = new Product('Телефон', 1000);
$product2 = new Product('Навушники', 200);
$product3 = new Product('Чохол для телефону', 50);

// Створюємо замовлення
$order1 = new Order(1);
$order2 = new Order(2);

// Додаємо товари до замовлень
$order1->addProduct($product1, 2); // 2 телефони
$order1->addProduct($product2, 1); // 1 навушники

print_r($order1);
echo ('</br>');
echo ('</br>');

$order2->addProduct($product1, 1); // 1 телефон
$order2->addProduct($product3, 3); // 3 чохли

print_r($order2);
echo ('</br>');
echo ('</br>');


// Змінюємо кількість товарів
$order1->addProduct($product1, 5); // Додаємо ще телефон до першого замовлення
$order2->removeProduct($product3, 3); // Видаляємо чохол з другого замовлення
print_r($order1);
echo ('</br>');
echo ('</br>');


print_r($order2);
echo ('</br>');
echo ('</br>');

// Виводимо загальну суму кожного замовлення
echo "Загальна сума замовлення 1: $" . $order1->calculateTotal();
echo ('</br>');
echo "Загальна сума замовлення 2: $" . $order2->calculateTotal();





