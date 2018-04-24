import Home from './views/Home'
// import Porfolio from './portfolio/Index.vue'
import New from './views/New'
import PortfolioSingle from './portfolio/Single'
import PortfolioSingleModal from './portfolio/PortfolioSingleModal'

export const routes = [
  { path: '/', name: 'Home', component: Home},
  { path: '/portfolio/:slug', component: PortfolioSingle,
      // children:[
      // {path: ':slug', component: PortfolioSingleModal, name: 'portfolioSingleModal'}
      // ]
  },
]
