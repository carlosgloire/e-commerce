/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["./public/admin/login.php","./public/admin/signup.php","./public/admin/dashboard.php","./public/admin/logout.php","./public/admin/navbar.php","./public/admin/header.admin.php","./public/admin/add_product.php","./public/admin/edit.php","./public/admin/product.php","./public/admin/stayActive.php","./public/produits/menu_bar.php","./public/produits/voir_en_detail.php","./public/produits/home.php","./public/produits/search_1.php","./public/produits/similar_product.php","./public/produits/categories.php","./public/produits/user/connexion_user.php","./public/user/menu_bar_user.php","./public/user/user.php","./public/produits/slider.html","./public/user/settings.php","./public/user/voir_en_detail.php"],
  theme: {
    extend: {
    fontFamily:{
      'sen':['Sen-Regular'], 
    }
  },
  plugins: [],
}
}
