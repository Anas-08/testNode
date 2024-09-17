import { useState } from 'react'
import './App.css'

import Home from './components/home/Home'
import Login from './components/login/Login'
import Registration from './components/registration/Registration'

function App() {
  const [count, setCount] = useState(0)

  return (
  <>
      {/* <Home /> */}
      {/* <Login /> */}
      <Registration/>
      
  </>
  )
}

export default App
