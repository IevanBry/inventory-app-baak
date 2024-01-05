const addButton = document.querySelectorAll(".tambah-barang");
let cart = document.querySelector("#keranjang table");
const deleteButton = document.querySelectorAll("#delete-button");
const qty = document.getElementById("qty");

let qtyValue = 0;

addButton.forEach((button) => {
	button.addEventListener("click", () => {
		cart.innerHTML += barang();
		// qtyValue += 1;
		// qty.innerHTML = qtyValue;
		setDeleteListeners(); // Perbarui event listeners setelah menambahkan produk baru
	});
});

function setDeleteListeners() {
	const deleteButtons = document.querySelectorAll(".delete-button"); // Ganti dari #delete-button menjadi .

	deleteButtons.forEach((button) => {
		button.addEventListener("click", () => {
			const productRow = button.closest(".product"); // Ganti dari #product menjadi .product
			// qtyValue -= 1;
			// qty.innerHTML = qtyValue;
			productRow.remove();
		});
	});
}

function barang() {
	return `
    <tr class="border-b product">
      <td class="delete-button px-2 py-4"><span class=" w-8 h-8 rounded"><i class='bx bx-x text-2xl text-gray-500'></i></span></td>
      <td class="px-6 py-4"><img alt="" class="w-36"></td>
      <td class="px-4 py-4">Nama barang</td>
      <td><input type="number" class="w-20 p-1 rounded focus:ring-sky-400 focus:border-sky-400" value="0"></td>
      <td class="px-3 py-4">Rp.5000</td>
    </tr>
  `;
}

setDeleteListeners();
