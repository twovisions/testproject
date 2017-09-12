<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
global $user;
$quantity = 0;
$total = '$0.00';
$order = commerce_cart_order_load($user->uid);
if ($order) {
  $wrapper = entity_metadata_wrapper('commerce_order', $order);
  $line_items = $wrapper->commerce_line_items;
  $quantity = commerce_line_items_quantity($line_items, commerce_product_line_item_types());
  $order_total = commerce_line_items_total($line_items);
}
?>
<a href="<?php print url('cart'); ?>" alt="View cart"  class="dtooltip" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php print $quantity; ?> item(s)">
  <i class="fa fa-shopping-cart"></i>
</a>
