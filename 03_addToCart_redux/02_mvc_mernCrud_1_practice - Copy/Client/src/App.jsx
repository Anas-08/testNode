import { Route, Routes } from 'react-router-dom'

import Home from './Home'
import Navbar from './Navbar'

import FormHome from './FormRegistration/FormHome'
import InsertForm from './FormRegistration/InsertForm'
import UpdateForm from './FormRegistration/UpdateForm'

import ErrorPage from './ErrorPage'

import BlogHome from './Blog/BlogHome'
import BlogInsert from './Blog/BlogInsert'
import BlogRedux from './Blog/BlogRedux'

function App() {
  
  return (
  <>
   <Navbar/>
    <Routes>

      <Route path='/' element={<Home/>}/>
      
      <Route path='question1' element={<FormHome/>} >
        <Route path='user' element={<InsertForm />} /> 
      </Route>
         
      <Route path='question2' element={<BlogHome />} >
        <Route path='blog' element={<BlogInsert />} /> 
        <Route path='blog/redux' element={<BlogRedux />} /> 
      </Route>
      

      <Route path='*' element={<ErrorPage/>}/>
    
    </Routes>
  </>
  )
}

export default App
