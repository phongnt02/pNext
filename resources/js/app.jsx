import { BrowserRouter as Router,Routes,Route } from "react-router-dom";
import { Fragment } from "react";
import DefaultLayout from "./layouts/DefaultLayout";
import { publicRoutes } from './routes'

function App() {
  return (
    <Router>
      <div className="App">
        <Routes>
          {publicRoutes.map((route, index) => {
            let Layout = DefaultLayout
            if(route.layout === null) {
              Layout = Fragment
            } else if(typeof route.layout == 'function'){
              Layout = route.layout
            }
            
            const ElementRoute = route.component
            return (
              <Route 
              key={index} 
              path={route.path} 
              element={
                <Layout>
                  <ElementRoute></ElementRoute>
                </Layout>
              }
            ></Route>
            )
          })}
        </Routes>
      </div>
    </Router>
  );
}

export default App;
