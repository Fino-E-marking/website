export function updatedescription() {


  document.querySelectorAll('.dscptn').forEach(itemdescription => {
      
      const produtName = itemdescription.dataset.productName;
      const produtId = itemdescription.dataset.productId;
      const produtoption = itemdescription.dataset.productOptions;
      const priceid = document.querySelector(`.${produtId}price`);
      const descriptionholder = document.querySelector(`.${produtId}description`);
      const optionholder = document.querySelectorAll(`.${produtId}optionid`)
      const productprice = priceid.innerHTML;
      descriptionholder.addEventListener('click',() => {
        updatedescriptiondetail(descriptionholder, produtName, priceid  )
      })
      descriptionholder.addEventListener('blur',() => {
        updatedescriptiondetail(descriptionholder, produtName, priceid)
      })
  })
}

function updatedescriptiondetail(descriptionholder, produtName, priceid) {
  if (descriptionholder.value === 'Parket') {
    switch (descriptionholder.value === 'Parket') {
    case (produtName === 'Mambo Chocolate 23g (pk=20)'):
        priceid.innerText = 3200
    break;
    case (produtName === 'Top milk (powder) 36g'):
      priceid.innerText = 4250
    break;
    
      default:
        break;
    }
  }
  if (descriptionholder.value === 'Roll') {
    switch (descriptionholder.value === 'Roll') {
    case (produtName === 'Top milk (powder) 36g'):
      priceid.innerText = 900
    break;
    case (produtName === 'Ozil 25g (Roll=12,bag=6rll)'):
      priceid.innerText = 500
    break;

      default:
        break;
    }
  }
  if (descriptionholder.value === 'Bag') {
    switch (descriptionholder.value === 'Bag') {
      case (produtName === 'Ozil 25g (Roll=12,bag=6rll)'):
          priceid.innerText = 6300
        break;
      case (produtName === 'Ozil 1kg'):
        priceid.innerText = 13000
      break;
  
      default:
        break;
    }
  }
  if (descriptionholder.value === 'Carton') {
    switch (descriptionholder.value === 'Carton') {
    case (produtName === 'Mambo Chocolate 23g (pk=20)'):
        priceid.innerText = 19000
      break;
    case (produtName === 'Nido +1 400g'):
      priceid.innerText = 38500
    break;
    case (produtName === 'Mayor oil 1litter (ctn=15)'):
        priceid.innerText = 22500
      break;
    case (produtName === 'Powder Peak milk 400g'):
      priceid.innerText = 39000
    break;
    case (produtName === 'Mayor oil 5litter (ctn=4)'):
      priceid.innerText = 30000
    break;
    case (produtName === 'Celor oil 5litter (ctn=4)'):
      priceid.innerText = 32000
    break;
    case (produtName === 'Cerelac 400g (childern food)'):
        priceid.innerText = 21600
      break;
    case (produtName === 'Guigoz 1 milk 400g (childern 1-6months)'):
      priceid.innerText = 34000
    break;       
    case (produtName === 'Guigoz 2 milk 400g (childern 6months-1y)'):
      priceid.innerText = 34000
    break;
    default:
        break;
    } 
  }
  if (descriptionholder.value === 'Pieces') {
    switch (descriptionholder.value === 'Pieces') {
      case (produtName === 'Mambo Chocolate 23g (pk=20)'):
          priceid.innerText = 200
        break;
      case (produtName === 'Nido +1 400g'):
        priceid.innerText = 3500
      break;                                            
      case (produtName === 'Mayor oil 1litter (ctn=15)'):
          priceid.innerText = 1600
        break;
      case (produtName === 'Powder Peak milk 400g'):
        priceid.innerText = 3500
      break;
      case (produtName === 'Mayor oil 5litter (ctn=4)'):
        priceid.innerText = 8000
      break;
      case (produtName === 'Celor oil 5litter (ctn=4)'):
        priceid.innerText = 8500
      break;                                            
      case (produtName === 'Cerelac 400g (childern food)'):
          priceid.innerText = 2000
        break;
      case (produtName === 'Guigoz 1 milk 400g (childern 1-6months)'):
        priceid.innerText = 3000
      break; 
      case (produtName === 'Guigoz 2 milk 400g (childern 6months-1y)'):
        priceid.innerText = 3000
      break;
      case (produtName === 'Ozil 1kg'):
        priceid.innerText = 1500
      break;
      default:
        break;
    }
  }
}