import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import { Route, Routes } from 'react-router-dom'
import Home from './Home'
import Product from './product/Product'
import Cart from './product/Cart'
import Navbar from './Navbar'

function App() {
  const [cart, setCart] = useState([])

  function addToCart(product){

    const existingProduct = cart.find((item) => item._id === product._id)

    if(existingProduct){
      setCart(cart.map((item) => 
        item._id === product._id ? { ...item, quantity : item.quantity + 1 } : item
      ))
    }else{
      setCart([...cart, {...product, quantity : 1}])
    }

    // setCart([
    //   ...cart,
    //   product
    //   ])
  }

  function removeFromCart(id){
    setCart(cart.filter((item) => item._id !== id))
  }

  function updateCartQuantity(productId, newQuantity){
    setCart(cart.map((item) => item._id === productId ? {...item, quantity : newQuantity} : item ))
  }

  return (
  <>
  <Navbar cart={cart} />
    <Routes>
        <Route path='/' element={<Home/>} />
        <Route path='product' element={<Product addToCart={addToCart} cart={cart} />} />
        <Route path='cart' element={<Cart cart={cart} removeFromCart={removeFromCart} updateCartQuantity={updateCartQuantity} />} />
        <Route path='*' element={"Invalid Page"} />
    </Routes>
  </>
  )
}

export default App
