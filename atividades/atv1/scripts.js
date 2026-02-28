
const buttons = document.querySelectorAll("#navbar button");
const formContainer = document.getElementById("formContainer");

const renderFormElement = async (formNumber) => {
  const arquivo = `form${formNumber}.html`;
  const response = await fetch(`forms/${arquivo}`);
  const html = await response.text();
  formContainer.innerHTML = html;
}

buttons.forEach(button => {
  button.addEventListener("click", async (b) => {
    const formNumber = b.target.innerText.split(" ")[1];
    renderFormElement(formNumber);
  });
});

renderFormElement(1);
