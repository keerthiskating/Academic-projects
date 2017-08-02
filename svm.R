library(kernlab)
chess <- read.csv("C:\\Users\\manu\\Desktop\\ML\\chess.dat", header=FALSE)
chess<-as.data.frame(chess)
chess
#preprocessing
chess$attr1 <- as.numeric(chess$attr1)
chessattr2<-as.numeric(chess$attr2)
chessattr3<-as.numeric(chess$attr3)
chessattr4<-as.numeric(chess$attr4)
chessattr5<-as.numeric(chess$attr5)
chessattr6<-as.numeric(chess$attr6)
chessoutcome<-as.numeric(chess$outcome)
chessattr1

plot(chess)
chess<-as.data.frame(chess)
index<-sample(1:nrow(chess),0.8*nrow(chess))
train_d<-chess[index,]
test_d<-chess[-index,]

#fitting the model on dataset
rbfkernel <- rbfdot(sigma = 0.1)
svm_model2<-ksvm(outcome~., rbfkernel, data =train_d , cost=0,type=NULL)

rbf <- rbfdot(sigma=0.01)
SVM <- ksvm(UNS~.,data=conditions,type="C-bsvc",kernel=rbf,C=10,prob.model=TRUE)


#getting the last label and finding the acuuracy
predSvm<-predict(svm_model2, train_d)

#Manu 
last_column = train_data[,ncol(train_d)]
#accuracy
mean(predSvm ==last_column)