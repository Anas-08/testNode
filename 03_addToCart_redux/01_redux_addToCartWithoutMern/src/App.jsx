import { useState } from 'react'
import { Route, Routes } from 'react-router-dom'
import Home from './Home'
import Navbar from './Navbar'
import Cart from './cart/Cart'
import BlogHome from './Blog/BlogHome'
import BlogInsert from './Blog/BlogInsert'
import BlogRedux from './Blog/BlogRedux'

function App() {
  const [count, setCount] = useState(0)

  return (
   <>
   <Navbar />
    <Routes>
      <Route path='/' element={<Home/>} />
      <Route path='/cart' element={<Cart/>} />

      <Route path='/blog' element={<BlogHome/>}>  
        <Route path='blog/usestate' element={<BlogInsert/>} />
        <Route path='blog/redux' element={<BlogRedux/>} />
      </Route>
      
    </Routes>
   </>
  )
}

export default App
