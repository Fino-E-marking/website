import { cart, removefromcart, updatecheckoutquantity, updatecheckoutsummaryamount, clickupdatebutton, updatecheckoutbody} from "./e_pro_cart.js";
import {containholder} from "./e_pro_products.js"

let cartsummaryHtml = '';

cart.forEach(checkoutitems => {
  const productId = checkoutitems.produtId
  let matchingproduct;
   
  containholder.forEach(product => {
    if (product.id === productId) {
      matchingproduct = product;
    }
  });
 cartsummaryHtml += `
  <div class="chk-l-b product-image-holder cart-item-div-${matchingproduct.id}${checkoutitems.productdescription}">
    <img class="product-image" src="${matchingproduct.image}" alt="product-image">
  </div>
  <div class="chk-l-b cart-item-div-${matchingproduct.id}${checkoutitems.productdescription} chk-b-product-name">
    ${checkoutitems.productName}
  </div>
  <div class="chk-l-b cart-item-div-${matchingproduct.id}${checkoutitems.productdescription}">
    ${checkoutitems.productdescription}
  </div>
  <div class="chk-l-b cart-item-div-${matchingproduct.id}${checkoutitems.productdescription} chk-l-quty ${matchingproduct.id}${checkoutitems.productdescription}p-quantity">
    <span class="${matchingproduct.id}${checkoutitems.productdescription}quantity">
      ${checkoutitems.productquantity}
    </span>
    <div class="quantity-update-holder gps hide-update 
    ${matchingproduct.id}${checkoutitems.productdescription}update-q">
      <label for="update-quantity">
        Enter new quantity
      </label><br>
      <input type="number" id="update-quantity" min="1"
      class="${matchingproduct.id}${checkoutitems.productdescription}quantity-u"
      data-update-holder ="${matchingproduct.id}${checkoutitems.productdescription}">
      <button class="confirm-button"
      data-update-holder ="${matchingproduct.id}${checkoutitems.productdescription}">OK</button>
    </div> 
  </div>
  <div class="chk-l-b cart-item-div-${matchingproduct.id}${checkoutitems.productdescription} ${matchingproduct.id}${checkoutitems.productdescription}unit">
    ${checkoutitems.produtPrice}
  </div>
  <div class="chk-l-b cart-item-div-${matchingproduct.id}${checkoutitems.productdescription} ${matchingproduct.id}${checkoutitems.productdescription}amount">
    ${checkoutitems.productamount}
  </div>
  <div class="chk-l-b cart-item-div-${matchingproduct.id}${checkoutitems.productdescription} chk-option">
    <button class="chk-update-btn js-update-link"
    data-update-holder ="${matchingproduct.id}${checkoutitems.productdescription}">Update</button>
    <button class="chk-delete-btn js-delete-link"
    data-product-id = "${matchingproduct.id}${checkoutitems.productdescription}">Delete</button>
  </div>
  `;
  clickupdatebutton()
  updatecheckoutbody()
});
document.querySelector('.js-list-body').innerHTML = cartsummaryHtml;

document.querySelectorAll('.js-delete-link')
.forEach((deletebutton) => {
  deletebutton.addEventListener('click', () => {
    const productId = deletebutton.dataset.productId;
    removefromcart(productId);
    const containers = document.querySelectorAll(`.cart-item-div-${productId}`);
    containers.forEach(container => {
      container.remove();
    })
  })
})

clickupdatebutton()

updatecheckoutbody()


updatecheckoutquantity()

updatecheckoutsummaryamount();

const placeorderbutton = document.querySelector(".Submit-cart")
placeorderbutton.addEventListener('click', ()=>{
  
})
