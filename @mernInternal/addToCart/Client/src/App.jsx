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
    setCart([
      ...cart,
      product
      ])
  }

  function removeFromCart(id){
    setCart(cart.filter((item) => item._id !== id))
  }

  return (
  <>
  <Navbar cart={cart} />
    <Routes>
        <Route path='/' element={<Home/>} />
        <Route path='product' element={<Product addToCart={addToCart} />} />
        <Route path='cart' element={<Cart cart={cart} removeFromCart={removeFromCart} />} />

        <Route path='*' element={"Invalid Page"} />
    </Routes>
  </>
  )
}

export default App
