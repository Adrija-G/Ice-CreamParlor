<?php
  class IceCreamParlor {
      private $flavors = ['Vaniglia (Classic Vanilla)', 'Cioccolato (Classic Chocolate)', 'Stracciatella (vanilla with chocolate bits)',
          'Mandorla (almond)', 'Limone (refreshing lemon)','Fragola (strawberry)', 'Spumoni (3 layers of flavors with candied fruit and nuts)','Bacio (chocolate-hazelnut)', 'Frutti di scusa (fruit)', 'Mint Chip', 'Coffee', 'Raspberry', 'Cookies & Cream', 'Butter Pecan', 'Rocky Road', 'Pistachio'];
      private $toppings = ['Sprinkles', 'Chocolate Chips', 'Whipped Cream', 'Caramel Sauce', 'Nuts', 'Marshmallows', 'Gummy Bears', 'Fudge', 'Cherries', 'Oreo Crumbs', 'Peanut Butter Cups', 'Toffee Bits', 'Blueberries', 'Raspberries', 'Coconut Flakes'];
      private $order = [];
  
      public function displayMenu() {
          echo "Welcome to Bianco!\n";
          echo "Today's Ice Cream Types:\n";
          echo "1. Sundae\n";
          echo "2. Cone\n";
          echo "3. Cup\n";
          echo "4. Banana Split\n";
          echo "5. Milkshake\n";
          echo "6. Float\n";
          echo "7. Waffle Bowl\n";
          echo "8. Ice Cream Sandwich\n";
          echo "9. Affogato\n";
          echo "10. Sorbet\n";
          echo "11. Sherbet\n";
          echo "12. Dondurma\n";
          echo "13. Kulfi\n";
          echo "14. Snow Cream\n";
          echo "15. Mochi\n";
          
          echo "\nToday's Flavors:\n";
          foreach ($this->flavors as $key => $flavor) {
              echo "[$key] $flavor\n";
          }
          
          echo "\nToppings Available:\n";
          foreach ($this->toppings as $key => $topping) {
              echo "[$key] $topping\n";
          }
      }
  
      public function takeOrder() {
          $this->displayMenu();
          echo "What type of ice cream would you like? (Enter the type number): ";
          $typeChoice = readline();
          echo "What flavor would you like? (Enter the flavor number): ";
          $flavorChoice = readline();
          echo "Any toppings? (Enter the topping number, separated by a space): ";
          $toppingChoice = explode(' ', readline());
  
          $selectedType = $this->getIceCreamType($typeChoice);
          $selectedFlavor = $this->flavors[$flavorChoice] ?? 'Vanilla';
          $selectedToppings = [];
          foreach ($toppingChoice as $topping) {
              $selectedToppings[] = $this->toppings[$topping] ?? '';
          }
  
          $this->order[] = [
              'type' => $selectedType,
              'flavor' => $selectedFlavor,
              'toppings' => $selectedToppings,
          ];
          echo "You have ordered a $selectedType ice-cream of $selectedFlavor flavor with " . implode(', ', $selectedToppings) . " toppings. ";
  
          $orderNumber = rand(1000, 9999);
          echo "Thank you! Please wait while your order is being prepared. We will call you when it is ready. Your order no. is $orderNumber.\n";
          exit(0);
      }
  
      public function serveOrder() {
          if (!empty($this->order)) {
              echo "Your Bianco Ice Cream Order:\n";
              foreach ($this->order as $index => $item) {
                  echo "[$index] Type: {$item['type']}, Flavor: {$item['flavor']}, Toppings: " . implode(', ', $item['toppings']) . "\n";
              }
          } else {
              echo "No orders yet. Place your order first!\n";
          }
      }
  
      private function getIceCreamType($typeChoice) {
          $iceCreamTypes = [
              1 => 'Sundae',
              2 => 'Cone',
              3 => 'Cup',
              4 => 'Banana Split',
              5 => 'Milkshake',
              6 => 'Float',
              7 => 'Waffle Bowl',
              8 => 'Ice Cream Sandwich',
              9 => 'Affogato',
              10 => 'Sorbet',
          ];
  
          return $iceCreamTypes[$typeChoice] ?? 'Cup';
      }
      
  }
  
  $biancoParlor = new IceCreamParlor();
  
  while (true) {
      echo "=======================\n";
      echo "Welcome to Bianco Ice Cream Parlor!\n";
      echo "=======================\n";
      echo "1. Place an order\n";
      echo "2. Serve orders\n";
      echo "3. Exit\n";
      $choice = readline("Enter your choice: ");
  
      switch ($choice) {
          case 1:
              $biancoParlor->takeOrder();
              break;
          case 2:
              $biancoParlor->serveOrder();
              break;
          case 3:
              echo "Thank you for visiting Bianco Ice Cream Parlor. Have a nice day!\n";
              exit(0);
          default:
              echo "Invalid choice. Please try again.\n";
      }
  }
?>
