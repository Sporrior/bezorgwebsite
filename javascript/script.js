const addButtonList = document.querySelectorAll(".menu-item button");
const itemList = document.querySelector("#item-list");
const orderTotal = document.querySelector("#order-total");
let totalCost = 0.0;
let itemCount = 0;

addButtonList.forEach(function (button) {
  button.addEventListener("click", function () {
  const item = this.parentElement;
  const name = item.querySelector("h2").textContent;
  const price = 10.0;
  totalCost += price;
  itemCount++;
  const li = document.createElement("li");
  li.appendChild(document.createTextNode(`${name} - ${price.toFixed(2)}`));
  itemList.appendChild(li);
  orderTotal.textContent = `${totalCost.toFixed(2)}`;
  
});
});


//   button.addEventListener("click", function (e) {
//     e.preventDefault();
    
//     var url = '/bezorgwebsite/addcart.php';
//     //const formData = new FormData(form);
//     var my_id = e.currentTarget.id;
//     var id_only_number = my_id.split('_')[1];
 

//     fetch("https://nocodeform.io/f/{your-form-id}",
//   {
//     method: "POST",
//     body: formData,
//   })
//   .then(response => console.log(response))
//   .catch(error => console.log(error));



//     var data = {id: id_only_number};
//     fetch(url, {
//       method: 'POST', // or 'PUT'
//       body: JSON.stringify(data), // data can be `string` or {object}!
//       headers:{
//         'Content-Type': 'application/json'
//       }
//     }).then(res => res.json())
//     .then(response => console.log('Success:', JSON.stringify(response)))
//     .catch(error => console.error('Error:', error));

//     const item = this.parentElement;

//     console.log(item);
  