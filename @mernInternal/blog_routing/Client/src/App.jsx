import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import { Route, Routes } from 'react-router-dom'

import Home from './Home'
import Error from './Error'
import Insert from './blog/Insert'
import Navbar from './Navbar'
import Display from './blog/Display'
import Update from './blog/Update'


function App() {
  const [count, setCount] = useState(0)

  return (
   <>
   <Navbar />
    <Routes>
      <Route path='/' element={<Home/>} />
      <Route path='insert' element={<Insert/>} />
      <Route path='display' element={<Display/>} />
       
      <Route path='display/update/:id' element={<Update />} />
      

      <Route path='*' element={<Error/>}></Route>
    </Routes>
   </>
  )
}

export default App
