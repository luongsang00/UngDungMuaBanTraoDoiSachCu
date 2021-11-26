
import './App.css';
import Landing from './components/layout/Landing';
import Auth from './views/Auth';
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom'
import AuthContextProvider from './contexts/AuthContext';
import Dashboard from './views/Dashboard';
import ProtectedRoute from './components/routing/ProtectedRoute';
import Cart from './views/Cart';

function App() {
  return (
    <AuthContextProvider>
      <Router>
      <Switch>
        <Route exact path='/' component={Landing} />
        <Route exact path='/login' render={props => <Auth {...props} authRoute='login' />}/>
        <Route exact path='/register' render={props => <Auth {...props} authRoute='register' />}/>
        <ProtectedRoute exact path='/dashboard' component={Dashboard}/>
        <ProtectedRoute exact path='/about' component={Cart}/>
      </Switch>
    </Router>
    </AuthContextProvider>
    
  );
}

export default App;
