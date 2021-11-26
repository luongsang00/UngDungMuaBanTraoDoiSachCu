import Button from 'react-bootstrap/Button'
import Form from 'react-bootstrap/Form'
import { Link,useHistory } from 'react-router-dom'
import { useContext, useState } from 'react'
import { AuthContext } from '../../contexts/AuthContext'
import AlertMessage from '../layout/AlertMessage'

const RegisterForm = () => {
	// Context
	const { registerUser } = useContext(AuthContext)
    //router
    const history = useHistory()
	// Local state
	const [RegisterForm, setRegisterForm] = useState({
		username: '',
        email: '',
		password: '',
		confirmPassword: ''
	})

	const [alert, setAlert] = useState(null)

	const { username,email, password, confirmPassword } = RegisterForm

	const onChangeRegisterForm = event =>
		setRegisterForm({
			...RegisterForm,
			[event.target.name]: event.target.value
		})

	const register = async event => {
		event.preventDefault()

		if (password !== confirmPassword) {
			setAlert({ type: 'danger', message: 'Mật khẩu không khớp' })
			setTimeout(() => setAlert(null), 5000)
			return
		}

		try {
			const registerData = await registerUser(RegisterForm)
			if (registerData.success) 
            {
                history.push('/dashboard')
            }
            else{
				setAlert({ type: 'danger', message: registerData.message })
				setTimeout(() => setAlert(null), 5000)
			}
		} catch (error) {
			console.log(error)
		}
	}

	return (
		<>
			<Form className='my-4' onSubmit={register}>
				<AlertMessage info={alert} />

				<Form.Group>
					<Form.Control
						type='text'
						placeholder='Username'
						name='username'
						required
						value={username}
						onChange={onChangeRegisterForm}
					/>
				</Form.Group>
                <Form.Group>
					<Form.Control
						type='text'
						placeholder='Email'
						name='email'
						required
						value={email}
						onChange={onChangeRegisterForm}
					/>
				</Form.Group>
				<Form.Group>
					<Form.Control
						type='password'
						placeholder='Password'
						name='password'
						required
						value={password}
						onChange={onChangeRegisterForm}
					/>
				</Form.Group>
				<Form.Group>
					<Form.Control
						type='password'
						placeholder='Confirm Password'
						name='confirmPassword'
						required
						value={confirmPassword}
						onChange={onChangeRegisterForm}
					/>
				</Form.Group>
				<Button variant='success' type='submit'>
					Register
				</Button>
			</Form>
			<p>
				Already have an account?
				<Link to='/login'>
					<Button variant='info' size='sm' className='ml-2'>
						Login
					</Button>
				</Link>
			</p>
		</>
	)
}

export default RegisterForm
