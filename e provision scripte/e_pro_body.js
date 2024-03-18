import {cart, addtocart} from "./e_pro_cart.js";
import {containholder} from "./e_pro_products.js";
import {updatedescription} from "./e_pro_updatedescription.js";
const producttemplate = document.querySelector("[data-products-template]");

const catergory = [...new Set(containholder.map((item) => {return item}))];
let searchbars = document.querySelectorAll("[data-search]");

searchbars.forEach(searchbar => {
  searchbar.addEventListener('keyup', (e) => {
    const searchinput =  e.target.value.toLowerCase();
    const filterdata = catergory.filter((item) => {
      return (
        item.name.toLocaleLowerCase().includes(searchinput)
      )
    })
    displayitem(filterdata);
  })
});


const displayitem = (items) => {
  document.querySelector('.body-holder').innerHTML=items.map((item) => {
    var { image, name, ratings, price, options, id } = item;
    return ( 
    `<div class="main ${id}hide">
      <div class="main-contian-holder">
        <div class="image-holder vjjz" id="chl-product-image1">
          <img class="product-image" src="${image}" alt="product image">
        </div>
        <div class="product-name">
          <p>${name}</p>
        </div>
        <div class="product-rating">
          <span>
            <img class="rating-star-image" src="icons/image_rating-star_${ratings.rating}.png" alt="rating star">
          </span>
          <span class="rate-point rate-points.js ${id}rattings">${ratings.points}</span>
        </div>
        <div class="product-description">
            <label for="description">Content :</label>
            <select name="description" class="${id}description dscptn" id="description"
            data-product-id="${id}"
            data-product-price="${price}"
            data-product-name="${name}">
              ${options}
            </select>
        </div>
        <div class="product-quantity">
          <label for="quantity">Qty:</label>
          <input type="number"  id="quantity" min="1" class="${id}quantity quty">
        </div>
        <div class="product-price">
          <p class="${id}price">${price}</p>
          frs
        </div>
        <div class="display-message mc">
              <button class="mamn dms-hide ${id}dmessageicn">
                <span class="fa fa-check vx2"></span>
              </button>
              <div class="dms-hide ${id}dmessage">Added to cart</div>
        </div>
        <div class="add-to-cart-button">
          <button class="add-to-cart add-to-cart-js"
          data-product-id="${id}"
          data-product-name="${name}"
          data-product-price="${price}"
          data-product-image="${image}"
          data-product-points="${ratings.points}" onclick="
          ">
            Add to cart
          </button>
        </div>
      </div>
    </div>`)
  }).join('')
  const defaultqtys = document.querySelectorAll('.quty');
  defaultqtys.forEach(defaultqty => {
    if (defaultqty.value === '') {
      defaultqty.value = 1;
    }
  })
  addtocartbutton();
  updatedescription();
};
displayitem(catergory);


function addtocartbutton() {
  document.querySelectorAll('.add-to-cart-js')
  .forEach(button => {
    button.addEventListener('click', () => {
      const produtImage = button.dataset.productImage;
      const produtName = button.dataset.productName;
      //const produtPrice = button.dataset.productPrice;
      const produtId = button.dataset.productId;
      const produtratingspoints = button.dataset.productPoints;
      const fixtid = document.querySelector(`.${produtId}description`);
      const quantityid = document.querySelector(`.${produtId}quantity`);
      const priceid = document.querySelector(`.${produtId}price`);
      const rattingsid = document.querySelector(`.${produtId}rattings`);
      const displaymssgicn = document.querySelector(`.${produtId}dmessageicn`);
      const displaymssg = document.querySelector(`.${produtId}dmessage`);
      const produtPrice = priceid.innerHTML
      const productdescription = fixtid.value;
      const productquantity = quantityid.value;
      const productamount = Number(produtPrice)*Number(productquantity);
      //const rateadd = Number(produtratingspoints) + 1;
      //rattingsid.innerHTML = Number(produtratingspoints) + 1;
      updaterattingpoints(rattingsid, produtId);

      addtocart(produtId, produtName, productdescription, productquantity, productamount, produtPrice);

      updatecartquantity();
      
      displaynotis(displaymssgicn, displaymssg);
    })
  })
}


function updaterattingpoints(rattingsid, produtId) {
  if (rattingsid.classList.contains('rate-point')) {
    document.querySelector(`.${produtId}rattings`).innerHTML =  Number(document.querySelector(`.${produtId}rattings`).innerHTML) + 1;
  }
}

updatecartquantity()
export function updatecartquantity() {
  let cartquantitys = 0;
      cart.forEach(items => {
        cartquantitys += items.quantity
      })
      document.querySelector('.cart-notis').innerHTML = cartquantitys;
}

function displaynotis(displaymssgicn, displaymssg) {
  displaymssgicn.classList.remove('dms-hide');
      displaymssg.classList.remove('dms-hide');
      setTimeout(() => {
        displaymssgicn.classList.add('dms-hide');
        displaymssg.classList.add('dms-hide'); 
      }, 1000);
}










