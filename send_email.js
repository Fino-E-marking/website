function sendemail(params) {
  const und = document.getElementById("amount").value;
  const tempParams = {
    from_name: document.getElementById("name").value,
    email: document.getElementById("email").value,
    phone_num: document.getElementById("phone_num").value,
    num_item: document.getElementById("num_item").value,
    amount: `${und}frs` ,
    condition: document.getElementById("condition").innerText
  };

  emailjs.send('service_p2vq4ap','template_223c74j', tempParams).then(function(res) {
    alert("success" + res.status);
  })
}