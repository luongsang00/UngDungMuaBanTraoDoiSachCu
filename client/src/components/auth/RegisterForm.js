import React from 'react'
import Button from 'react-bootstrap/Button'
import Form from 'react-bootstrap/Form'
import {Link} from 'react-router-dom'

const RegisterForm = () => {
    return (
        <>
        <Form className="my-4">
            <Form.Group>
                <Form.Control 
                    type='text' 
                    placeholder='Username' 
                    name='username' 
                    required
                />
            </Form.Group>
            <Form.Group>
                <Form.Control 
                    type='text' 
                    placeholder='Email' 
                    name='email' 
                    required
                />
            </Form.Group>
            <Form.Group>
                <Form.Control 
                    type='text' 
                    placeholder='GioiTinh' 
                    name='gioitinh' 
                />
            </Form.Group>
            <Form.Group>
                <Form.Control 
                    type='text' 
                    placeholder='Dia chi' 
                    name='diachi' 
                />
            </Form.Group>
            <Form.Group>
                <Form.Control 
                    type='text' 
                    placeholder='Ngay sinh' 
                    name='ngaysinh' 
                />
            </Form.Group>
            <Form.Group>
                <Form.Control 
                    type='password' 
                    placeholder='Password' 
                    name='password' 
                    required
                />
            </Form.Group>
            <Form.Group>
                <Form.Control 
                    type='password' 
                    placeholder='Confirm Password' 
                    name='confirmpassword' 
                    required
                />
            </Form.Group>

            <Button variant='success' type='sumit'>Register</Button>
        </Form>
        <p>
            Already have an account
            <Link to='/login'>
                <Button variant='info' size='sm' className='ml-2'>Login</Button>
            </Link>
        </p>
        </>
    )
}

export default RegisterForm
