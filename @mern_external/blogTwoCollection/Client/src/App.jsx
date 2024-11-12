import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import { Route, Routes } from 'react-router-dom'
import Home from './Home'
import Blog from './Blog'
import Navbar from './Navbar'

function App() {
  const [count, setCount] = useState(0)

  return (
   <>
   <Navbar/>
    <Routes>
      <Route path='/' element={<Home/>}  />
      <Route path='/blogs' element={<Blog/>}  />
    </Routes>
   </>
  )
}

export default App
