import { useState } from 'react'
import './App.css'
import { Route, Routes } from 'react-router-dom'
import FormReg from './Registration/FormReg'
import UpdateForm from './Registration/UpdateForm'

function App() {
  return (
   <>
    <Routes>
      <Route path='/' element={<FormReg/>} />
      <Route path='/updateUser/:id' element={<UpdateForm/>} />
    </Routes>
   </>
  )
}

export default App
