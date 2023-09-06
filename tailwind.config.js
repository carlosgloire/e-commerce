/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/admin/login.php","./public/admin/signup.php","./public/admin/dashboard.php","./public/admin/logout.php","./public/admin/navbar.php","./public/admin/header.admin.php","./public/admin/add_product.php","./public/admin/edit.php","./public/admin/product.php","./public/produits/menu_bar.php","./public/produits/voir_en_detail.php","./public/produits/home.php","./public/produits/search_1.php"],
  theme: {
    extend: {
    fontFamily:{
      'sen':['Sen-Regular'], 
    }
  },
  plugins: [],
}
}
