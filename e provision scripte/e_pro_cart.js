
export let cart = JSON.parse(localStorage.getItem('carts'));



if (!cart) {
  cart = [];
}

function savestocart() {
  localStorage.setItem('carts', JSON.stringify(cart))
}

export function addtocart(produtId, produtName, productdescription, productquantity, productamount, produtPrice) {
  let matchingItem;
  cart.forEach(cartItems => {
    if (produtName === cartItems.productName && productdescription === cartItems.productdescription) {
      matchingItem = cartItems;
    }
  })

  if (matchingItem) {
    //matchingItem.quantity += 1;
    matchingItem.productquantity = Number( matchingItem.productquantity) + Number(productquantity);
  }else {
    cart.push({
      produtId: produtId,
      productName: produtName,
      quantity: 1,
      productdescription:  productdescription,
      productquantity: productquantity,
      productamount: productamount,
      produtPrice: produtPrice
    });
  }

  defaultqtydisplay(); 
  clickupdatebutton();
  updatecheckoutbody();
  savestocart();

}

function defaultqtydisplay() {
  const defaultqtys = document.querySelectorAll('.quty');
  defaultqtys.forEach(defaultqty => {
      defaultqty.value = 1;
  })
}


export function removefromcart(productId) {
   let newcart = [];

   cart.forEach((checkoutitems) => {
      const checkoutitemsproductId = checkoutitems.produtId + checkoutitems.productdescription
      if (checkoutitemsproductId !== productId) {
        newcart.push(checkoutitems)
      }

   })
   cart = newcart;
   
   clickupdatebutton();
   updatecheckoutbody();
   savestocart();
   updatecheckoutquantity();
   updatecheckoutsummaryamount();
}

export function updatecheckoutquantity() {
  const hidecheckoutbody =document.querySelector('.checkout-body');
  let checkoutquantity = 0;
  cart.forEach(items => {
      checkoutquantity += items.quantity;
    })
 
  if (checkoutquantity < 10 ) {
    document.querySelector('.js-summary-chk-num').innerHTML = `0${checkoutquantity}`;
  }else {
    document.querySelector('.js-summary-chk-num').innerHTML = checkoutquantity;
  }
  if ((checkoutquantity === 0)) {
    document.querySelector('.checkout-h-title').innerText = `You Cart Is Emty`;
    hidecheckoutbody.classList.add('hide-checkout-body');
  }else {
    document.querySelector('.js-chck-h-title-num').innerHTML = checkoutquantity;
    hidecheckoutbody.classList.remove('hide-checkout-body');
  }
}

export function updatecheckoutsummaryamount() {
  let checkoutsammaryamount = 0;
  cart.forEach(items => {
      checkoutsammaryamount += items.productamount;
    });
  document.querySelector('.js-summary-chk-amount').innerHTML = checkoutsammaryamount;
  savestocart();
};

export function clickupdatebutton() {
  document.querySelectorAll(".js-update-link")
  .forEach(updatebutton => {
    const updateholderlink = updatebutton.dataset.updateHolder;
    let updateholder = document.querySelector(`.${updateholderlink}update-q`);
    const updatequantity = document.querySelector(`.${updateholderlink}quantity-u`);
    const updateHolders = document.querySelectorAll('.gps');
    updatequantity.value = document.querySelector(`.${updateholderlink}quantity`).innerText; 
    updatebutton.addEventListener('click', () => {
      updateHolders.forEach(subholders =>{
        if (!subholders.classList.contains('hide-update')) {
          subholders.classList.add('hide-update');
        }
      })
      if (updateholder.classList.contains('hide-update')) {
        updateholder.classList.remove('hide-update');
      }else{
        updateholder.classList.add('hide-update');
      }
    }) 
  })
}

export function updatecheckoutbody() {
  document.querySelectorAll(".confirm-button")
  .forEach(okbutton => {
    const updateholderlink = okbutton.dataset.updateHolder;
    const updateholder = document.querySelector(`.${updateholderlink}update-q`);
    const productudtunit = document.querySelector(`.${updateholderlink}unit`);
    const productudtamount = document.querySelector(`.${updateholderlink}amount`);
    const productudtquantity = document.querySelector(`.${updateholderlink}p-quantity`);
    const updatequantity = document.querySelector(`.${updateholderlink}quantity-u`);
    okbutton.addEventListener('click', ()=>{
    
      document.querySelector(`.${updateholderlink}quantity`).innerText = updatequantity.value;

      updateholder.classList.toggle('hide-update');

      document.querySelector(`.${updateholderlink}amount`).innerText = Number(productudtunit.innerText) * Number(productudtquantity.innerText);
    })
    
  })
  savestocart();
}

