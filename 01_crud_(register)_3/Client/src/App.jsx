import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import { Route, Routes } from 'react-router-dom'
import InsertRegister from './registr/InsertRegister'
import UpdateRegister from './registr/UpdateRegister'
import Insert from './registr/Insert'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
      <Routes>
        <Route path='/' element={<Insert/>}/>
        <Route path='/updateUser/:id' element={<UpdateRegister/>}/>
      </Routes>
    </>
  )
}

export default App
